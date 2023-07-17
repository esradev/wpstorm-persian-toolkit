import React, {useState} from 'react';

const SaveButton = ({
    text, sendingText, doneText
                    }) => {
    const [buttonState, setButtonState] = useState('idle');

    const handleButtonClick = () => {
        setButtonState('sending');
        setTimeout(() => setButtonState('done'), 4000);
        setTimeout(() => setButtonState('idle'), 6000);
    };

    const renderButtonContent = () => {
        switch (buttonState) {
            case 'sending':
                return (
                    <>
                        <svg
                            className="animate-spin mr-2 h-5 w-5 text-white"
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
                        <svg
                            className="h-5 w-5 text-white mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 -960 960 960"
                            fill="currentColor"
                        >
                            <path d="m421-298 283-283-46-45-237 237-120-120-45 45 165 166Zm59 218q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z" />
                        </svg>
                        <span>{doneText}</span>
                    </>
                );
            default:
                return <span>{text}</span>;
        }
    };

    return (
        <button
            className="flex px-4 py-2 bg-blue-500 text-white text-center justify-center focus:outline-none"
            onClick={handleButtonClick}
        >
            {renderButtonContent()}
        </button>
    );
};

export default SaveButton;