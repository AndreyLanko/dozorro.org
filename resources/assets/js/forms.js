/*!
 *
 * Dozorro JsonForms v1.0.0
 *
 * Author: Lanko Andrey (lanko@perevorot.com)
 *
 * © 2016
 *
 */

var FORMS,
    spin_options={
        color:'#FFF',
        lines: 15,
        width: 2
    };

(function(window, undefined){
    'use strict';

    FORMS = (function(){
        var formSelector=$('[form-selector]'),
            formContainer=$('[form-container]'),
            formSuccess=$('[form-success]'),
            formError=$('[form-error]'),
            loader=$('[loader]'),
            _params={
                tenderId: formContainer.data('tender-id'),
                tenderPublicId: formContainer.data('tender-public-id')
            };

        var generators={
            formF101: function(){
            }
        };

        var validators={
            formF101: function(errors, values) {
                return true;

                if (!values.generalScore){
                    return false;
                }

                if (!values.generalComment || values.generalComment.length < 30) {
                    $('[name=generalComment]').closest('.controls').find('.jsonform-errortext').removeAttr('style').text('Поле обов`язкове до заповнення, та повине мати довжину більше 30 символів');
    
                    return false;
                }
    
                return !errors;
            }
        };

        var generateForm=function(formCode, callback){
            $.ajax({
                url: '/sources/forms/' + formCode + ".json",
                success: function(json){
                    var formSchema = findFormShema(json);

                    if(formSchema){
                        formSchema.onSubmitValid=function (values) {
                            submitReviewForm(values, formCode);
                        };
                        
                        if(_params.validate && typeof validators[_params.validate]=='function'){
                            formSchema.onSubmit=validators[_params.validate];
                        }

                        if(typeof callback == 'function'){
                            var form=$('<form>').attr('action', '/jsonforms').attr('novalidate', true);

                            formContainer.append('<h3>' + formSchema.title + '</h3>');
                            
                            callback(formSchema, form);
                        }
                    }
                },
                dataType: 'json'
            });
        };

        var initMultiFormAccordeon=function(){
            formContainer.find('h3').wrapInner('<a href="">').each(function(){
                $(this).next().hide();
            });

            formContainer.find('h3 > a').click(function(e){
                e.preventDefault();

                formContainer.find('form').slideUp();
                $(this).parent().next().stop(true).slideToggle(checkButton);

                return false;
            });
        }
        
        var checkButton=function(){
            var hidden=formContainer.find('form:visible').length==0;

            formContainer.find('[type="submit"]')[hidden?'hide':'show']();
        }

        var generateForms=function(callback){
            var forms=_params.form.split('+');
            
            for(var i=0; i<forms.length; i++){
                generateForm(forms[i], callback);
            }
        }
        
        var isMultiForm=function(){
            return formsCount()>1;
        }

        var formsCount=function(){
            return _params.form.split('+').length;
        }
        
        var submitCounter;
        
        var submitReviewForm=function(values, formCode, successCallback){
            loader.show().spin(spin_options);

            $.ajax({
                method: 'POST',
                data: {
                    form: values,
                    tender_id: _params.tenderId,
                    form_code: formCode,
                    tender_public_id: _params.tenderPublicId
                },
                url: '/jsonforms',
                dataType: 'json',
                headers: csrf(),
                success: function (response) {
                    submitCounter++;

                    if (response) {
                        if(submitCounter==formsCount()){
                            loader.spin(false).hide();
                            if(typeof successCallback == 'function'){
                                successCallback();
                            }
    
                            formSuccess.show();
                            formContainer.empty();
                        }
                    } else {
                        loader.spin(false).hide();
                        formError.show();
                        formContainer.find('form').addClass('hidden');

                        setTimeout(function () {
                            formError.hide();
                            formContainer.find('form').removeClass('hidden');
                        }, 4000);
                    }
                }
            });
        }
        
        var csrf=function(){
            return {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            };
        }
        
        var findFormShema=function(top) {
            if ('form' in top && 'properties' in top) {
                top['schema'] = top['properties'];

                delete top['properties'];
                return top;
            }

            if (top && typeof top == 'object') {
                for (var key in top) {
                    var res = null;
                    if (typeof top[key] == 'object'){
                        if (res = findFormShema(top[key])){
                            return res;
                        }
                    }
                }
            }

            return null;
        }
        
        var methods={
            js: {
                jsonForm: function (_self) {
                    _self.click(function(e){
                        e.preventDefault();

                        var generateCounter=0;

                        _params=$.extend(_params, _self.data());
                        submitCounter=0;
                        
                        generateForms(function(formSchema, form){
                            formSelector.hide();
                            generateCounter++;

                            formContainer.append(form);
                            form.jsonForm(formSchema);

                            if(!isMultiForm()){
                                form.append('<input type="submit" value="Залишити відгук">');
                            }else{
                                if(generateCounter==formsCount()){
                                    var multiSumbit=$('<input>').attr('type', 'submit').attr('value', 'Залишити відгук');
                                    
                                    multiSumbit.click(function(e){
                                        e.preventDefault();

                                        formContainer.find('form').submit();
                                    });

                                    initMultiFormAccordeon();

                                    formContainer.append(multiSumbit);
                                    multiSumbit.hide();
                                }
                            }


                            if(_params.generate && typeof generators[_params.generate]=='function'){
                                generators[_params.generate]();
                            }
                        });
                    });
                },
                open: function(_self){
                    _self.click(function(e) {
                        e.preventDefault();

                        $('.add-review-form').popup({
                            transition: 'all 0.3s'
                        });

                        formSelector.show();
                        formContainer.empty();
                        formError.hide();
                        formSuccess.hide();
                    });                    
                }
            }
        };

        return methods;
    }());

    $(function (){
        $('[data-formjs]').each(function(){
            var self = $(this);

            if (typeof FORMS.js[self.data('formjs')] === 'function'){
                FORMS.js[self.data('formjs')](self, self.data());
            } else {
                console.log('No `' + self.data('formjs') + '` function in app.js');
            }
        });
    });
})(window);

