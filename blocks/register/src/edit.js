import { useState } from '@wordpress/element';
import { BlockControls, InspectorControls, RichText } from '@wordpress/block-editor';
import { Panel, PanelBody, TextControl } from '@wordpress/components';

const Edit = (props) => {
    const { className, attributes, setAttributes } = props;
    const { title, nameLabel, emailLabel, passwordLabel, text } = attributes;
    const [hasText, setHasText] = useState(text);

    return (
        <>
            <InspectorControls>
                <Panel>
                    <PanelBody title="Labels" initialOpen={true}>
                        <TextControl
                            label="Name Label"
                            value={nameLabel}
                            onChange={(newNameLabel) => setAttributes({ nameLabel: newNameLabel })}
                        />
                        <TextControl
                            label="Email Label"
                            value={emailLabel}
                            onChange={(newEmailLabel) => setAttributes({ emailLabel: newEmailLabel })}
                        />
                        <TextControl
                            label="Password Label"
                            value={passwordLabel}
                            onChange={(newPasswordLabel) => setAttributes({ passwordLabel: newPasswordLabel })}
                        />
                    </PanelBody>
                </Panel>
            </InspectorControls>
            <BlockControls
                controls={[
                    {
                        icon: 'text',
                        title: 'Add Text',
                        isActive: text || hasText,
                        onClick: () => setHasText(!hasText),
                    }
                ]}
            />
            <div className={className}>
                <RichText
                    tagName="h1"
                    placeholder='Write a title'
                    className='title'
                    value={title}
                    onChange={(newTitle) => setAttributes({ title: newTitle })}
                />
                {(text || hasText) &&
                    <RichText
                        tagName="p"
                        placeholder='Write a paragraph'
                        value={text}
                        onChange={(newText) => setAttributes({ text: newText })}
                    />
                }
                <form className="signin__form" id="frontend-register-form">
                    <div className="form-group">
                        <div class="form-group">
                            <label for="Name">{nameLabel}</label>
                            <input className="form-control" name="name" type="text" id="Name" />
                        </div>
                        <div className="form-group">
                            <label for="email">{emailLabel}</label>
                            <input className="form-control" name="email" type="email" id="email" />
                        </div>
                        <div className="form-group">
                            <label for="password">{passwordLabel}</label>
                            <input className="form-control" name="password" type="password" id="password" />
                        </div>
                        <div className="form-group">
                            <input className="form-control btn btn-primary" type="submit" value="Create" />
                        </div>
                    </div>
                    <div id="frontend-login-register-message"></div>
                </form>
            </div>
        </>
    );
};

export default Edit;