package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.concurrent.TimeUnit;

public class VerificationPage extends BasePage {

    @FindBy(xpath = "//a[@href='interview.php']")
    WebElement navInterviewPage;

    public VerificationPage (WebDriver webDriver) {
        super(webDriver);
    }

    void goToInterviewPage() throws InterruptedException {
        navInterviewPage.click();
        TimeUnit.SECONDS.sleep(3);
    }
}
