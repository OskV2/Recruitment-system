package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class LandingPage extends BasePage {
    @FindBy(className="landing__content-number")
    WebElement applicationNumber;

    @FindBy(xpath = "//a[@href='check.php']")
    WebElement linkToCheckPage;

    String applicationId = applicationNumber.getAttribute("innerHTML");

    public LandingPage(WebDriver webDriver) {
        super(webDriver);
    }

    void goToCheckPage() {
        linkToCheckPage.click();
    }
}
