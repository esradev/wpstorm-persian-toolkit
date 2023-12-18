import React, {useState} from 'react';

const SaveButton = ({
    text, sendingText, doneText, errorText
                    }) => {
    const [buttonState, setButtonState] = useState('idle');

    const handleButtonClick = () => {
        setButtonState('sending');
        setTimeout(() => setButtonState('done'), 4000);        // setTimeout(() => setButtonState('error'), 4000);
        setTimeout(() => setButtonState('idle'), 6000);
    };

    const renderButtonContent = () => {
        switch (buttonState) {
            case 'sending':
                return (
                    <>
                        <svg
                            className="animate-spin mr-2 h-7 w-7 text-white justify-center"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                className="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                strokeWidth="4"
                            ></circle>
                            <path
                                className="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 0012 20c4.411 0 8-3.589 8-8h-2c0 3.309-2.691 6-6 6-1.818 0-3.446-.818-4.536-2.109L6 13.292z"
                            ></path>
                        </svg>
                        <span>{sendingText}</span>
                    </>
                );
            case 'done':
                return (
                    <>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="justify-center w-7 h-7 mr-2 text-white">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        <span>{doneText}</span>
                    </>
                );
            case 'error':
                return (
                    <>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="justify-center w-7 h-7 mr-2 text-white">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                        </svg>
                        <span>{errorText}</span>
                    </>
                );
                default:
                return <span>{text}</span>;
        }
    };

    return (
        <button
            className={`${buttonState === 'sending' ? "bg-blue-400 " : buttonState === 'done' ? "bg-green-600 " : buttonState === "error" ? "bg-red-600" : "bg-blue-600 "} flex px-4 py-2 text-white text-center justify-center text-lg rounded-xl shadow-xl focus:outline-none`}
            onClick={handleButtonClick}
        >
            {renderButtonContent()}
        </button>
    );
};

export default SaveButton;