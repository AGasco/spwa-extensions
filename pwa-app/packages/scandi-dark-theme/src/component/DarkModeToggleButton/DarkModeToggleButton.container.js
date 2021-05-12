import { connect } from 'react-redux';

import { enableDarkMode } from '../../store/DarkMode/DarkMode.action';
import DarkModeToggleButton from './DarkModeToggleButton.component';

/** @namespace ScandiDarkTheme/Component/DarkModeToggleButton/Container/mapStateToProps */
export const mapStateToProps = (_state) => ({
    isDarkModeEnabled: _state.DarkModeReducer.enabled
});

/** @namespace ScandiDarkTheme/Component/DarkModeToggleButton/Container/mapDispatchToProps */
export const mapDispatchToProps = (_dispatch) => ({
    enableDarkMode: (enabled) => _dispatch(enableDarkMode(enabled))
});

export default connect(mapStateToProps, mapDispatchToProps)(DarkModeToggleButton);
