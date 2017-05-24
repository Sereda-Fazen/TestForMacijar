<?php
namespace Step\Functional\Common;


use Exception;
use Page\RoyalRobbinsPage;

class Steps extends \FunctionalTester
{

    /**
     * @param $request
     * @param $expect
     * ROYAL ROBBINS
     */


    public function sendRequestAndCheckCanonicals ($request, $expect)
    {
        $I = $this;
        $test[0] = '/[\\\\\.]|(Z\(\?ms\))$/';
        $canonical = RoyalRobbinsPage::$canonical;
        $close = RoyalRobbinsPage::$close;
        $I->amOnPage(preg_replace($test, '', $request));
        $I->canSeeElement($canonical . $expect . $close);
        $I->expect('have a canonical tag pointing to - ' .$expect);
        $I->comment('-------');

    }

    public function sendRequestAndCheckErrors ($request, $expect) {
        $I = $this;
        $test[0] = '/301,/';
        $test[1] = '/((http[s]?:\/\/)|(www\.))[\S]+(\.com)/';
        $I->amOnPage($request);
        //$I->canSeeInCurrentUrl(substr($expect, 32));
        $I->canSeeInCurrentUrl(preg_replace ( $test, '', $expect));
        $I->expect('errors tag pointing to the first page - '.$expect);
        $I->comment('-------');
    }

    public function sendRequestAndCheckDescription ($request, $expect) {
        $I = $this;
        $canonical = RoyalRobbinsPage::$decs;
        $close = RoyalRobbinsPage::$close2;
        $I->amOnPage($request);
        $I->canSeeElement($canonical.$expect.$close);
        $I->expect('a description tag pointing to - '.$expect);
        $I->comment('-------');
    }

    public function sendRequestAndCheckNofollows ($request, $expect) {
        $I = $this;
        $nofollow = RoyalRobbinsPage::$nofollow;
        $test[0] = '/[\\\\\.]|(Z\(\?ms\))$/';
        $I->amOnPage(preg_replace ($test, '', $request));
        $I->canSeeElement($nofollow);
        $I->expect('to have errors tag pointing to the first page - '.$expect);
        $I->comment('-------');
    }

    public function sendRequestAndCheckRedirects ($request, $expect) {
        $I = $this;
        $test[0] = '/301,/';
        $test[1] = '/((http[s]?:\/\/)|(www\.))[\S]+(\.com)/';
        $I->amOnPage($request);
        //$I->canSeeInCurrentUrl(substr($expect, 32));
        $I->canSeeInCurrentUrl(preg_replace ( $test, '', $expect));
        $I->expect('redirects tag pointing to the first page - '.$expect);
        $I->comment('-------');
    }

    public function sendRequestAndCheckRobots ($request, $expect) {
        $I = $this;
        $robots = RoyalRobbinsPage::$robots;
        $test[0] = '/[\\\\\.]|(Z\(\?ms\))$/';
        $I->amOnPage(preg_replace ( $test, '', $request));
        $I->canSeeElement($robots);
        $I->expect('a robots tag pointing to - '.$expect);
        $I->comment('-------');
    }

    public function sendRequestAndCheckTitles ($request, $expect) {
        $I = $this;
        $titles = RoyalRobbinsPage::$title;
        $I->amOnPage($request);
        $I->canSeeElement($titles);
        $I->canSeeInTitle($expect);
        $I->expect('titles tag pointing to the first page - '.$expect);
        $I->comment('-------');
    }








    /**------------------------------------------------------------------------
     *
     */
    /*
$test = $I->grabTextFrom('body');
if (stripos($test, 'Error: Server Error') === true){
$I->comment($test);
} else {
    $I->canSeeElement($canonical . html_entity_decode($expect) . $close);
    $I->expect('have a canonical tag pointing to - ' . html_entity_decode($expect));
}
$I->comment('-------');
    */
}