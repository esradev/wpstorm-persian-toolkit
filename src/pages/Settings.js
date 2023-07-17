import React, {useState} from 'react';

import Toggle from "../components/Toggle"
import SaveButton from "../components/SaveButton"

const Settings = () => {

    const handleSaveSettings = (e) => {
        // Perform save operation or API request here
        e.preventDefault()
    };

    return (
        <div className="container mx-auto p-4">
            <h1 className="text-2xl font-bold mb-4">Settings</h1>
            <form onSubmit={handleSaveSettings}>
                <Toggle label={"Load Icons"} />
                <SaveButton text="Save Settings" sendingText="Saving..." doneText="Settings saved successfully!" />
            </form>
        </div>
    );
};

export default Settings;