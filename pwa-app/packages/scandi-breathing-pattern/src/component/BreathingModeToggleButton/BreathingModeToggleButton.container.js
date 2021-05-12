import { connect } from 'react-redux';

import { enableBreathingMode } from '../../store/BreathingMode/BreathingMode.action';
import BreathingModeToggleButton from './BreathingModeToggleButton.component';

/** @namespace ScandiBreathingPattern/Component/BreathingModeToggleButton/Container/mapStateToProps */
export const mapStateToProps = (_state) => ({
    isBreathingModeEnabled: _state.BreathingModeReducer.enabled
});

/** @namespace ScandiBreathingPattern/Component/BreathingModeToggleButton/Container/mapDispatchToProps */
export const mapDispatchToProps = (_dispatch) => ({
    enableBreathingMode: (enabled) => _dispatch(enableBreathingMode(enabled))
});

export default connect(mapStateToProps, mapDispatchToProps)(BreathingModeToggleButton);
