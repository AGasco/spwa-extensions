import PropTypes from 'prop-types';
import { PureComponent } from 'react';

import { ChildrenType } from "Type/Common";

import './DarkModeProvider.style';

/** @namespace ScandiDarkTheme/Component/DarkModeProvider/Component/DarkModeProviderComponent */
export class DarkModeProviderComponent extends PureComponent {
    static propTypes = {
        isDarkModeEnabled: PropTypes.func.isRequired,
        children: ChildrenType.isRequired,
    };

    render() {
        const { children, isDarkModeEnabled } = this.props;

        return (
            <div block="DarkModeProvider" mods={{ isEnabled: isDarkModeEnabled }}>
                { children }
            </div>
        );
    }
}

export default DarkModeProviderComponent;
