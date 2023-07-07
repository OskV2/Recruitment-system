package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class CheckPage extends BasePage {
    @FindBy(id="App_Id")
    WebElement appIdInput;

    public CheckPage (WebDriver webDriver) {
        super(webDriver);
    }

    void checkApplicationStatus(String number) {
        appIdInput.sendKeys(number);
        appIdInput.sendKeys(Keys.ENTER);
    }
}
