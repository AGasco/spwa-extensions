import PropTypes from 'prop-types';
import { PureComponent } from 'react';

import './BreathingModeToggleButton.style';

/** @namespace ScandiBreathingPattern/Component/BreathingModeToggleButton/Component/BreathingModeToggleButtonComponent */
export class BreathingModeToggleButtonComponent extends PureComponent {
    static propTypes = {
        isBreathingModeEnabled: PropTypes.bool.isRequired,
        enableBreathingMode: PropTypes.func.isRequired
    };

    render() {
        const { isBreathingModeEnabled, enableBreathingMode } = this.props;

        return (
            <button
              block="ModeToggleButton"
              aria-label={ __('Toggle Breathing Mode') }
              // eslint-disable-next-line react/jsx-no-bind
              onClick={ () => enableBreathingMode(!isBreathingModeEnabled) }
            >
                { __('Toggle Breathing Mode') }
            </button>
        );
    }
}

export default BreathingModeToggleButtonComponent;
