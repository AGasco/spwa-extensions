import PropTypes from 'prop-types';
import { PureComponent } from 'react';

import './DarkModeToggleButton.style';

/** @namespace ScandiDarkTheme/Component/DarkModeToggleButton/Component/DarkModeToggleButtonComponent */
export class DarkModeToggleButtonComponent extends PureComponent {
    static propTypes = {
        isDarkModeEnabled: PropTypes.bool.isRequired,
        enableDarkMode: PropTypes.func.isRequired
    };

    render() {
        const { isDarkModeEnabled, enableDarkMode } = this.props;

        return (
            <button
              block="ModeToggleButton"
              aria-label={ __('Toggle Dark Mode') }
              // eslint-disable-next-line react/jsx-no-bind
              onClick={ () => enableDarkMode(!isDarkModeEnabled) }
            >
                { __('Toggle Dark Mode') }
            </button>
        );
    }
}

export default DarkModeToggleButtonComponent;
