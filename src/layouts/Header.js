import React from 'react';
import {__} from '@wordpress/i18n';

const Header = () => {
    return (
        <header className="bg-gray-900 shadow-md">
            <div className="container mx-auto py-4 px-6 flex items-center justify-between">
                <div className="flex items-center">
                    <span className="text-gray-100 text-lg font-semibold">{__('Wpstorm Toolkit', 'wpstorm-tk')}</span>
                </div>
                <nav>
                    <ul className="flex space-x-4">
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 px-3 py-2 hover:text-indigo-100"
                            >
                                {__('Home','wpstorm-tk')}
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 px-3 py-2 hover:text-indigo-100"
                            >
                                {__('Dashboard','wpstorm-tk')}

                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 px-3 py-2 hover:text-indigo-100"
                            >
                                {__('Settings','wpstorm-tk')}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    );
};

export default Header;
