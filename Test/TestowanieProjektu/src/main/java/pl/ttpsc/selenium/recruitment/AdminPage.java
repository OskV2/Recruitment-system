package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.concurrent.TimeUnit;

public class AdminPage extends BasePage {

    @FindBy(xpath = "//a[@href='new.php']")
    WebElement navNewPage;

    public AdminPage (WebDriver webDriver) {
        super(webDriver);
    }

    void goToNewPage() throws InterruptedException {
        navNewPage.click();
        TimeUnit.SECONDS.sleep(3);
    }
}
