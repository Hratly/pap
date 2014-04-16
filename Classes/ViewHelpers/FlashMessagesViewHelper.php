<?php
namespace TYPO3\PapMarketplace\ViewHelpers;

class FlashMessagesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

   	/**
	 * Renders one or more flash messages with the correct classes to be used together with
	 * Bootstrap's CSS for alert boxes.
	 *
 	 * Example usage:
	 * {namespace bootstrap=TYPO3\Twitter\Bootstrap\ViewHelpers}
	 * <bootstrap:flashMessages />
	 *
	 * @return string HTML source for displaying flash messages
	 */
	public function render() {
		$flashMessages = $this->controllerContext->getFlashMessageQueue()->getAllMessagesAndFlush();
		if (count($flashMessages) < 1) {
			return '';
		}

		$result = '';
		foreach ($flashMessages as $flashMessage) {
			// render a bigger box if there's a title
			if ($flashMessage->getTitle() != '') {
				$alertClass = 'alert alert-block';
				$title = '<h4>' . $flashMessage->getTitle() . '</h4>';
			} else {
				$alertClass = 'alert';
				$title = '';
			}

			// assign the correct color to the alert box - note: not all severities are supported by bootstrap!
			switch($flashMessage->getSeverity()) {
				case \TYPO3\CMS\Core\Messaging\FlashMessage::NOTICE: $severityClass = 'alert-info';
					break;
				case \TYPO3\CMS\Core\Messaging\FlashMessage::INFO: $severityClass = 'alert-info';
					break;
				case \TYPO3\CMS\Core\Messaging\FlashMessage::OK: $severityClass = 'alert-success';
					break;
				case \TYPO3\CMS\Core\Messaging\FlashMessage::WARNING: $severityClass = '';
					break;
				case \TYPO3\CMS\Core\Messaging\FlashMessage::ERROR: $severityClass = 'alert-error';
					break;
			}

			// put together all the output for this single flash message
			$result .= '<div class="' . $alertClass . ' ' . $severityClass .'">' . $title . $flashMessage->getMessage() . '</div>';
		}

		return $result;
	}

}
?>