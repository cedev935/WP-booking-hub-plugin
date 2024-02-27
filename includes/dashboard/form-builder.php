<?php


class BookingHub_Form_Builder {

    function __construct() {
		//add_action( 'admin_init', [$this, 'settings_init'] );
		add_action( 'admin_menu', [$this, 'options_page'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'] );
        //add_filter( 'admin_footer_text', '__return_false' );
	}

    function options_page() {
        add_submenu_page(
            'edit.php?post_type=bhub-booking',
            __('Form Builder', 'hub-booking'),
            __('Form Builder', 'hub-booking'),
            'manage_options',
            'form_builder',
            [$this,'form_builder']
        );
    
    }

    function admin_enqueue_scripts() {
        wp_enqueue_script( 'form-js', BHUB_URL . 'assets/vendor/form-js/form-editor.umd.js', [], '1.1.0', false );
        wp_enqueue_style( 'form-js', BHUB_URL . 'assets/vendor/form-js/form-js.css', [], '1.1.0' );
        wp_enqueue_style( 'form-js-editor', BHUB_URL . 'assets/vendor/form-js/form-js-editor.css', [], '1.1.0' );  
    }
    
    function form_builder() {
        ?>

        <style>.fjs-editor-container{max-height:calc(100vh - 125px);}</style>
        <div id="form"></div>

        <script>

            // @SEE https://github.com/bpmn-io/form-js
            // @SEE https://github.com/bpmn-io/form-js/tree/develop/packages/form-js-editor
            const schema =  {
                "components": [
                {
                    "type": "text",
                    "text": "# Invoice\nLorem _ipsum_ __dolor__ `sit`.\n  \n  \nA list of BPMN symbols:\n* Start Event\n* Task\nLearn more about [forms](https://bpmn.io).\n  \n"
                },
                {
                    "key": "creditor",
                    "label": "Creditor",
                    "type": "textfield",
                    "validate": {
                    "required": true
                    },
                    "layout": {
                    "columns": 8,
                    "row": "Row_1"
                    }
                },
                {
                    "description": "An invoice number in the format: C-123.",
                    "key": "invoiceNumber",
                    "label": "Invoice Number",
                    "type": "textfield",
                    "validate": {
                    "pattern": "^C-[0-9]+$"
                    },
                    "layout": {
                    "columns": 8,
                    "row": "Row_1"
                    }
                },
                {
                    "key": "amount",
                    "label": "Amount",
                    "type": "number",
                    "validate": {
                    "min": 0,
                    "max": 1000
                    }
                },
                {
                    "key": "approved",
                    "label": "Approved",
                    "type": "checkbox"
                },
                {
                    "key": "approvedBy",
                    "label": "Approved By",
                    "type": "textfield",
                    "conditional": {
                    "hide": "=approved = false"
                    }
                },
                {
                    "key": "approverComments",
                    "label": "Approver comments",
                    "type": "textarea",
                    "conditional": {
                    "hide": "=approved = false"
                    }
                },
                {
                    "key": "supportPhoneNumber",
                    "label": "Support Phone Number ",
                    "type": "textfield",
                    "validate": {
                    "validationType": "phone"
                    }
                },
                {
                    "key": "mailto",
                    "label": "Email data to",
                    "type": "checklist",
                    "values": [
                    {
                        "label": "Approver",
                        "value": "approver"
                    },
                    {
                        "label": "Manager",
                        "value": "manager"
                    },
                    {
                        "label": "Regional Manager",
                        "value": "regional-manager"
                    }
                    ]
                },
                {
                    "key": "product",
                    "label": "Product",
                    "type": "radio",
                    "values": [
                    {
                        "label": "Camunda Platform",
                        "value": "camunda-platform"
                    },
                    {
                        "label": "Camunda Cloud",
                        "value": "camunda-cloud"
                    }
                    ]
                },
                {
                    "key": "dri",
                    "label": "Assign DRI",
                    "type": "radio",
                    "valuesKey": "queriedDRIs"
                },
                {
                    "key": "tags",
                    "label": "Taglist",
                    "type": "taglist",
                    "values": [
                    {
                        "label": "Tag1",
                        "value": "tag1"
                    },
                    {
                        "label": "Tag2",
                        "value": "tag2"
                    },
                    {
                        "label": "Tag3",
                        "value": "tag3"
                    }
                    ]
                },
                {
                    "key": "language",
                    "label": "Language",
                    "type": "select",
                    "values": [
                    {
                        "label": "German",
                        "value": "german"
                    },
                    {
                        "label": "English",
                        "value": "english"
                    }
                    ]
                },
                {
                    "key": "conversation",
                    "type": "datetime",
                    "subtype": "datetime",
                    "dateLabel": "Date of conversation",
                    "timeLabel": "Time of conversation",
                    "timeSerializingFormat": "utc_normalized",
                    "timeInterval": 15,
                    "use24h": false
                },
                {
                    "source": "=logo",
                    "alt": "The bpmn.io logo",
                    "type": "image"
                },
                {
                    "key": "disabled",
                    "label": "A disabled field",
                    "type": "textfield",
                    "defaultValue": "some value",
                    "disabled": true
                },
                {
                    "key": "readonly",
                    "label": "A readonly field",
                    "type": "textfield",
                    "defaultValue": "some value",
                    "readonly": true
                },
                {
                    "key": "submit",
                    "label": "Submit",
                    "type": "button"
                },
                {
                    "action": "reset",
                    "key": "reset",
                    "label": "Reset",
                    "type": "button"
                }
                ],
                "type": "default"
            };
            const container = document.querySelector('#form');

            const formEditor = FormEditor.createFormEditor({
                container,
                schema
            });


            // get form data
            formEditor.then((formEditorInstance) => {
            const schema = formEditorInstance._state.schema;
            const components = schema.components;

            const componentsJSON = JSON.stringify(components);
            console.log(componentsJSON);

            //update_option('your_option_name', componentsJSON);
            }).catch((error) => {
                console.error(error);
            });





        </script>

        <?php
    }

}

new BookingHub_Form_Builder();