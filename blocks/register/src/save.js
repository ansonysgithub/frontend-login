import { RichText } from '@wordpress/block-editor';

const Save = (props) => {
    const { className, attributes } = props;
    const { title, nameLabel, emailLabel, passwordLabel, text } = attributes;

    return (
        <div className={className}>
            <RichText.Content
                tagName="h1"
                className='title'
                value={title}
            />
            {text &&
                <RichText.Content
                    tagName="p"
                    value={text}
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
    );
};

export default Save;