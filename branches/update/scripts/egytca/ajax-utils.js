var setRequestStatus = function(status, statusBox) {
	switch (status) {
		case 'success':
			statusBox.innerHTML = "<span style=\"color: green\">\u2714</span>";
			break;
		case 'failure':
			statusBox.innerHTML = "<span style=\"color: red\">\u2716</span>";
			break;
		case 'working':
			statusBox.innerHTML = 'working...';
			break;
		default:
			throw Error('invalid status: ' + status);
	}
};
