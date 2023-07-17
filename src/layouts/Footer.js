import React from 'react';

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
                                About
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 hover:text-gray-900 transition duration-300"
                            >
                                Contact
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                className="text-gray-100 hover:text-gray-900 transition duration-300"
                            >
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    );
};

export default Footer;
