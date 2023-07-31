import React, {useState} from 'react';
import Toggle from "./Toggle";
import SaveButton from "./SaveButton";

const Form = ({
    inputs
              }) => {
    const [toggleState, setToggleState] = useState(false);


    const handleFormSubmit = (e) => {
        // Perform save operation or API request here
        e.preventDefault()
    };
    const onChangeToggle = () => {
        setToggleState(prevState => !prevState);
    }

    return (
        <form onSubmit={handleFormSubmit}>
            {Object.values(inputs).map((input) =>
                input.type === 'checkbox' ? (
                        <Toggle label={input.label} checked={toggleState} onChange={onChangeToggle} value={toggleState}/>
                ) : (
                    <input type={input.type} />
                )
            )}
            <SaveButton text="Save Settings" sendingText="Saving..." doneText="Settings saved successfully!" errorText="Ops! There was an error, Try again later."/>
        </form>
    );
};

export default Form;