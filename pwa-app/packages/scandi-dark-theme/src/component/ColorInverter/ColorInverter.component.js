import { ChildrenType } from 'Type/Common';
import PropTypes from 'prop-types';
import { PureComponent } from 'react';

import './ColorInverter.style';

/** @namespace ScandiDarkTheme/Component/ColorInverter/Component/ColorInverterComponent */
export class ColorInverterComponent extends PureComponent {
    static propTypes = {
        isDarkModeEnabled: PropTypes.bool.isRequired,
        children: ChildrenType.isRequired
        };

    render() {
        const { children, isDarkModeEnabled } = this.props;

        return (
            <div block="ColorInverter" mods={{ isInverted: isDarkModeEnabled}}>
                { children }
            </div>
        );
    }
}

export default ColorInverterComponent;
