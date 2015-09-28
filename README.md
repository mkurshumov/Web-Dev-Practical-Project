<h1>
    Practical Project Assignment for the <a href="https://softuni.bg/trainings/1211/Web-Development-Basics-September-2015">Web Development Basics @ SoftUni</a>
</h1>
<p>
    Design and implement a <strong>Shopping cart/CMS/RPG Game</strong> <strong>using PHP and HTML / CSS / JavaScript</strong>. Your project must meet all the
    requirements listed below.
</p>

<h2>
    Requirements
</h2>

<ul>
    <li>
        <strong>Use PHP </strong> - the major part of your work should be PHP written
        <ul>
            <li>You should create custom PHP Framework</li>
            <li>You should create the project over your framework</li>
            <li>You must additionally<strong> </strong>use <strong>HTML5, CSS3</strong> to create the content and to stylize your web application</li>
            <li>You may optionally use<strong> JavaScript, jQuery, Bootstrap</strong></li>
            <li>Use <strong>PHP 5 or higher (7 is a bonus)</strong></li>
        </ul>
    </li>
</ul>

<ul>
    <li>
        <strong>User source control system</strong>
        <ul>
            <li><strong>Use GitHub </strong>or other source control system<strong> </strong>as project collaboration platform</li>
        </ul>
    </li>
</ul>

<ul>
    <li>
        <p>Publish your project <strong>live in Internet</strong> - your project should be public in Internet</p>
        <ul>
            <li>You may <strong>share your project</strong> to get external feedback</li>
            <li>Most shared and commented projects will get additional <strong>bonus score</strong></li>
        </ul>
    </li>
</ul>

<ul>
    <li>
        <strong>Valid and high-quality PHP, HTML and CSS</strong>
        <ul>
            <li>Follow the best practices fr PHP development: <a href="http://www.phptherightway.com/">http://www.phptherightway.com</a>.</li>
            <li>Validate (when possible) your HTML (<a href="http://validator.w3.org/">http://validator.w3.org</a>) and CSS code (    <a href="http://css-validator.org/">http://css-validator.org</a>)</li>
            <li>Follow the best practices for <strong>high-quality PHP, HTML and CSS</strong>: good formatting, good code structure, consistent naming etc.</li>
        </ul>
    </li>
</ul>

<ul>
    <li>
        <strong>Usability, UX and browser support</strong>
        <ul>
            <li>Your web application should be easy-to-use, with intuitive UI, with good usability</li>
            <li>Ensure your web application works correctly in the latest HTML5-compatible browsers: Chrome, Firefox, IE, Opera, Safari (latest versions, desktop and
                mobile versions)</li>
            <li>You do not need to support old browsers like IE9</li>
        </ul>
    </li>
</ul>

<ul>
    <li>
        <strong>Framework requirements</strong>
        <ul>
            <li>
                <strong>ABSOLUTELY REQUIRED</strong> (without those ones the project is invalidated
                <ul>
                    <li>Default routing system</li>
                    <li>
                        Custom routing system
                        <ul>
                            <li>Easy way to define custom routes with parameters and parameter types</li>
                        </ul>
                    </li>
                    <li>
                        Areas
                        <ul>
                            <li>Custom routing for areas; It should override the global routing configuration</li>
                        </ul>
                    </li>
                    <li>Strongly typed views</li>
                    <li>POST requests actions using Binding Models</li>
                    <li>
                        ViewHelpers for Forms, Ajax submitted Forms, CSRF Token
                        <ul>
                            <li>
                                Form ViewHelper
                                <ul>
                                    <li>Radio buttons</li>
                                    <li>Checkboxes</li>
                                    <li>Dropdowns</li>
                                    <li>Text fields</li>
                                    <li>Password fields</li>
                                    <li>Textareas</li>
                                </ul>
                            </li>
                            <li>Out of the box escaping the html chars unless stated otherwise</li>
                        </ul>
                    </li>
                    <li>
                        Other
                        <ul>
                            <li>
                                Data annotations
                                <ul>
                                    <li>@Authorize - the method is not called if the user is not logged in</li>
                                    <li>@Admin - the method is not called if the user is not logged and is not administrator</li>
                                </ul>
                            </li>
                            <li>
                                Overriding default route config with annotations
                                <ul>
                                    <li>@POST - the method can be called only on POST</li>
                                    <li>@PUT - the method can be called only on PUT</li>
                                    <li>@DELETE - the method can be called only on DELETE</li>
                                    <li>@GET - can be omitted. If declared or not, the method is called only on GET</li>
                                    <li>@Route("route/here") - declares the route action is called upon</li>
                                </ul>
                            </li>
                            <li>Dependency injection configuration (config file or annotation)</li>
                            <li>User roles and config/annotation for them (method is not called if user is not in the role)</li>
                            <li>Upload files ViewHelper</li>
                            <li>Help page that scans all routes (configured, annotated and basic ones) and shows them (e.g. PUT users/{id}). Opening the route shows the serialized
                                Binding Model that accepts if any or primitive parameters if any. (e.g. {name: name, email: email}, or ?id={id}&amp;name={name})</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>