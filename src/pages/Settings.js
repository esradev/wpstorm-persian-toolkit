import React, {useState} from 'react';
import {useImmerReducer} from "use-immer";
import {__} from '@wordpress/i18n'

import Page from "../components/Page";

const Settings = ({
    label
                  }) => {

    const initialState = {
        inputs: {
            elementorIcons: {
                value: "",
                hasErrors: false,
                errorMessage: "",
                onChange: "elementorIconsChange",
                name: "elementorIcons",
                type: "checkbox",
                label: __("Load extra icons in Elementor?", "wpstorm-tk"),
            },
            elementorDate: {
                value: "",
                hasErrors: false,
                errorMessage: "",
                onChange: "elementorDateChange",
                name: "elementorDate",
                type: "checkbox",
                label: __("Change Gregorian date to Solar in Elementor?", "wpstorm-tk"),
            },
        }
    };

    function ourReducer(draft, action) {
        switch (action.type) {

        }
    }

    const [state, dispatch] = useImmerReducer(ourReducer, initialState);


    return (
        <Page pageLabel={label} inputs={state.inputs}/>
    );
};

export default Settings;