<?php

namespace App\Services\ReCaptha;

// Include Google Cloud dependencies using Composer
use Google\Cloud\RecaptchaEnterprise\V1\Client\RecaptchaEnterpriseServiceClient;
use Google\Cloud\RecaptchaEnterprise\V1\Event;
use Google\Cloud\RecaptchaEnterprise\V1\Assessment;
use Google\Cloud\RecaptchaEnterprise\V1\CreateAssessmentRequest;
use Google\Cloud\RecaptchaEnterprise\V1\TokenProperties\InvalidReason;

class ReCaptcha
{

    const ENDPOINT_URL = 'https://recaptchaenterprise.googleapis.com/v1/projects/mementomorri95/assessments?key=';
    /**
     * Class constructor.
     */
    public function __construct()
    {
        // $this-> = $;
    }

    public function verfiy() {}

    // public function create_assessment(
    //     string $recaptchaKey,
    //     string $token,
    //     string $project,
    //     string $action
    // ): void {
    //     // Create the reCAPTCHA client.
    //     // TODO: Cache the client generation code (recommended) or call client.close() before exiting the method.
    //     $client = new RecaptchaEnterpriseServiceClient();
    //     $projectName = $client->projectName($project);

    //     // Set the properties of the event to be tracked.
    //     $event = (new Event())
    //         ->setSiteKey($recaptchaKey)
    //         ->setToken($token);

    //     // Build the assessment request.
    //     $assessment = (new Assessment())
    //         ->setEvent($event);

    //     $request = (new CreateAssessmentRequest())
    //         ->setParent($projectName)
    //         ->setAssessment($assessment);

    //     try {
    //         $response = $client->createAssessment($request);

    //         // Check if the token is valid.
    //         if ($response->getTokenProperties()->getValid() == false) {
    //             printf('The CreateAssessment() call failed because the token was invalid for the following reason: ');
    //             printf(InvalidReason::name($response->getTokenProperties()->getInvalidReason()));
    //             return;
    //         }

    //         // Check if the expected action was executed.
    //         if ($response->getTokenProperties()->getAction() == $action) {
    //             // Get the risk score and the reason(s).
    //             // For more information on interpreting the assessment, see:
    //             // https://cloud.google.com/recaptcha-enterprise/docs/interpret-assessment
    //             printf('The score for the protection action is:');
    //             printf($response->getRiskAnalysis()->getScore());
    //         } else {
    //             printf('The action attribute in your reCAPTCHA tag does not match the action you are expecting to score');
    //         }
    //     } catch (exception $e) {
    //         printf('CreateAssessment() call failed with the following error: ');
    //         printf($e);
    //     }
    // }
}




// // TODO: Replace the token and reCAPTCHA action variables before running the sample.
// create_assessment(
//     '6LdfPQQsAAAAAL69jGJoHiiUVZXxKHjDblLsHFNm',
//     'YOUR_USER_RESPONSE_TOKEN',
//     'mementomorri95',
//     'YOUR_RECAPTCHA_ACTION'
// );
