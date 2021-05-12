import { PureComponent } from 'react';

import { ChildrenType } from 'Type/Common';

import './ExtensionsButtons.style';

/** @namespace PwaApp/Component/ExtensionsButtons/Component/ExtensionsButtonsComponent */
export class ExtensionsButtonsComponent extends PureComponent {
    static propTypes = {
        children: ChildrenType.isRequired
    };

    render() {
        const { children } = this.props;

        console.log('children', children);

        return (
            <div block="ExtensionsButtons">
                { children }
            </div>
        );
    }
}

export default ExtensionsButtonsComponent;
