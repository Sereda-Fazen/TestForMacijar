<?php

/**
 * @group test
 */

class TestCest
{


    public function smokeTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->waitForElement('.navbar-toggle');
        $I->click('.navbar-toggle');
        $I->waitForElement('#searchterm');
        $I->fillField('#searchterm', 'Services');
        $I->click('.cm-search__button');
        $I->waitForElement('.alert-success');
        $I->see('search results for - Services - found.', '.alert-success');
        $I->click('//div[@class="cm-search__caption" and contains(.,"Services")]');
        $I->waitForElement('.breadcrumb');
        $I->click('//ul[@class="cm-breadcrumb breadcrumb"]//a[@href="/corporate/for-professionals"]');
        $I->waitForElement('//h1[contains(.,"For Professionals")]');
        $I->click('.navbar-toggle');
        $I->waitForElement('#searchterm');
        $I->waitForElement('//a[@class="cm-menu__title"][@href="/corporate/company/about"]');
        $I->wait(2);
        $I->seeElement('//a[@class="cm-menu__title"][@href="/corporate/company/about"]');
        $I->click('//a[@class="cm-menu__title"][@href="/corporate/company/about"]');
        $I->waitForText('Learn more about Chef Corp.');

        $I->click('.navbar-toggle');
        $I->waitForElement('#searchterm');
        $I->waitForElement('//a[@class="cm-menu__title"][@href="/corporate/company/careers"]');
        $I->wait(2);
        $I->seeElement('//a[@class="cm-menu__title"][@href="/corporate/company/careers"]');
        $I->click('//a[@class="cm-menu__title"][@href="/corporate/company/careers"]');
        $I->waitForText('Open Positions');

    }
}

