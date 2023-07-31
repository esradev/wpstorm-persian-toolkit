import React from 'react';

import Form from "./form/Form";

const Page = ({
 pageLabel,
    inputs
              }) => {
    return (
        <div className="container mx-auto p-4">
            <span className="inline-block text-3xl mb-12 px-4 py-1">{pageLabel}</span>
            <Form inputs={inputs}/>
        </div>
    );
};

export default Page;