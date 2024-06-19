window.addEventListener('DOMContentLoaded', function () {
	if (!seoFriendlyExitRouterAjax || !seoFriendlyExitRouterAjax.show_url) {
		return;
	}

	let timeLeft = this.document.querySelector('#time-left');
	if (!timeLeft) {
		return;
	}

	let timeRemaining = seoFriendlyExitRouterAjax.routing_delay || 5;
	let tracker = setInterval(function () {
		if (timeRemaining < 1) {
			clearInterval(tracker);
			window.location.assign(seoFriendlyExitRouterAjax.show_url);
			window.open(seoFriendlyExitRouterAjax.show_url, '_top');
		}
		timeLeft.textContent = timeRemaining;
		timeRemaining--;
	}, 1000);
});
