package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.concurrent.TimeUnit;

public class InterviewPage extends BasePage {

    @FindBy(xpath = "//a[@href='admin.php']")
    WebElement navAdminPage;

    public InterviewPage (WebDriver webDriver) {
        super(webDriver);
    }

    void goToAdminPage() throws InterruptedException {
        navAdminPage.click();
        TimeUnit.SECONDS.sleep(3);
    }
}
