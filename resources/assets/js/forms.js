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
            formToolbar=$('[form-toolbar]'),
            formSuccess=$('[form-success]'),
            formError=$('[form-error]'),
            formTitle=$('[form-title]'),
            formTitleDefault=formTitle.text(),
            loader=$('[loader]'),
            submitCounter,        
            _params,
            _paramsDefault={
                tenderId: formContainer.data('tender-id'),
                tenderPublicId: formContainer.data('tender-public-id')
            },
            _extraValues={};

        var generators={
            comment: function(){
            }
        };

        var initializers={
            comment: function(_self){
                _self.click(function(){
                    _extraValues.thread_id=_self.data('parent');
                    
                    formTitle.html(formTitleDefault);
                    formSelector.show();
                    formContainer.empty();
                    formToolbar.empty();
                    formError.hide();
                    formSuccess.hide();

                    $('#my_popup').popup('show');
                });
            }
        };

        var validators={
            comment: function(errors, values){
                if (!values.text || values.text.length < 30) {
                    $('[name=text]').closest('.controls').find('.jsonform-errortext').removeAttr('style').text('Поле обов`язкове до заповнення, та повине мати довжину більше 30 символів');
    
                    return false;
                }
    
                return !errors;
            },
            formF101: function(errors, values) {
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

                            if(formSchema.title){
                                formContainer.append('<h3>' + formSchema.title + '</h3>');
                            }
                            
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

            formToolbar.find('[type="submit"]')[hidden?'hide':'show']();
            $('.add-review-form__content')[hidden?'removeClass':'addClass']('toolbar');
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
        
        var submitReviewForm=function(values, formCode, successCallback){
            loader.show().spin(spin_options);

            values=$.extend(values, _extraValues);

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

                            if(_params.next && $('['+_params.next+']').length){
                                formContainer.empty();
                                formToolbar.empty();

                                $('['+_params.next+'] a').click();
                            }else{
                                formSuccess.show();
                                formContainer.empty();
                                formToolbar.empty();
                            }
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
                    if(_self.data('init') && typeof initializers[_self.data('init')]=='function'){
                        initializers[_self.data('init')](_self);
                    }

                    _self.click(function(e){
                        e.preventDefault();

                        var generateCounter=0;

                        _params=_self.data();
                        _params=$.extend(_params, _paramsDefault);

                        formTitle.html(_params.formTitle ? _params.formTitle : formTitleDefault);
                        submitCounter=0;
                        
                        generateForms(function(formSchema, form){
                            formSelector.hide();
                            generateCounter++;

                            formContainer.append(form);
                            form.jsonForm(formSchema);

                            if(!isMultiForm()){
                                form.append('<input type="submit" value="'+_params.submitButton+'">');
                            }else{
                                if(generateCounter==formsCount()){
                                    var multiSumbit=$('<input>').attr('type', 'submit').attr('value', _params.submitButton);
                                    
                                    multiSumbit.click(function(e){
                                        e.preventDefault();

                                        formContainer.find('form').submit();
                                    });

                                    initMultiFormAccordeon();

                                    formToolbar.append(multiSumbit);
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

                        formTitle.html(formTitleDefault);
                        formSelector.show();
                        formContainer.empty();
                        formToolbar.empty();
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

