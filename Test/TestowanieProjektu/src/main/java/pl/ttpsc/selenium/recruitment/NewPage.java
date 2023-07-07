package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.concurrent.TimeUnit;

public class NewPage extends BasePage {

    @FindBy(xpath = "//a[@href='verification.php']")
    WebElement navVerificationPage;

    public NewPage (WebDriver webDriver) {
        super(webDriver);
    }

    void goToVerificationPage() throws InterruptedException {
        navVerificationPage.click();
        TimeUnit.SECONDS.sleep(3);
    }
}
