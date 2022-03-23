@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../orchestra/testbench-core/testbench
php "%BIN_TARGET%" %*
