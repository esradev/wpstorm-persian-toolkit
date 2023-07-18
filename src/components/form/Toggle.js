import React from 'react';

const Toggle = ({
    label,
    checked,
    onChange,
    value
                }) => {
    return (
        <div className="flex items-center w-full mb-12">
            <label htmlFor="toggle" className="flex items-center justify-center cursor-pointer">
                <div className="mx-2 text-lg text-gray-700 font-medium">
                    {label}
                </div>
                <div className="relative shadow-xl rounded-full">
                    <input type="checkbox" id="toggle" className="sr-only" checked={checked} onChange={onChange} value={value}/>
                    <div className={`${checked ? 'bg-blue-300 ' : 'bg-gray-300 '} block w-10 h-6 rounded-full`}></div>
                    <div className={`${checked ? 'translate-x-full bg-blue-600 ' : 'bg-white '} absolute left-1 top-1 w-4 h-4 rounded-full transition`}></div>
                </div>

            </label>

        </div>
    );
};

export default Toggle;