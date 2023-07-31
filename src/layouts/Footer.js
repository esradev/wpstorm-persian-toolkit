import React from 'react';
import {__} from '@wordpress/i18n';

const Footer = () => {
    return (
        <footer className="bg-gray-900">
            <div className="container mx-auto py-4 px-6 flex items-center justify-between">
                <div className="text-gray-100">
                    &copy; {new Date().getFullYear()} Your App Name. All rights reserved.
                </div>
                <nav>
                    <ul className="flex space-x-4">
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 hover:text-gray-900 transition duration-300"
                            >
                                {__('About','wpstorm-tk')}
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 hover:text-gray-900 transition duration-300"
                            >
                                {__('Contact','wpstorm-tk')}
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 hover:text-gray-900 transition duration-300"
                            >
                                {__('Privacy Policy','wpstorm-tk')}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    );
};

export default Footer;
