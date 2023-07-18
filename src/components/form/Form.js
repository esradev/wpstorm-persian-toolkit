import React, {useState} from 'react';
import Toggle from "./Toggle";
import SaveButton from "./SaveButton";

const Form = () => {
    const [toggleState, setToggleState] = useState(false);


    const handleFormSubmit = (e) => {
        // Perform save operation or API request here
        e.preventDefault()
    };
    const onChangeToggle = (e) => {
        setToggleState(prevState => !prevState);
    }

    return (
        <form onSubmit={handleFormSubmit}>
            <Toggle label={"Load Icons"} checked={toggleState} onChange={onChangeToggle} value={toggleState}/>
            <SaveButton text="Save Settings" sendingText="Saving..." doneText="Settings saved successfully!" errorText="Ops! There was an error, Try again later."/>
        </form>
    );
};

export default Form;