import React from 'react';

const Toggle = ({
    label
                }) => {
    return (
        <div className="flex items-center w-full mb-12">
            <label htmlFor="toggle" className="flex items-center cursor-pointer">
                <div className="relative">
                    <input type="checkbox" id="toggle" className="sr-only"/>
                    <div className="block bg-gray-600 w-14 h-8 rounded-full"></div>
                    <div className="wpstorm-toggle-dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                </div>
                <div className="ml-3 text-gray-700 font-medium">
                    {label}
                </div>
            </label>

        </div>
    );
};

export default Toggle;