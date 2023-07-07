package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.concurrent.TimeUnit;

public class AddPage extends BasePage {

    @FindBy(id="firma")
    WebElement offerName;

    @FindBy(id="telefon")
    WebElement offerDescription;

    @FindBy(id="email")
    WebElement offerBenefits;

    @FindBy(id="adres")
    WebElement offerRequirements;

    @FindBy(xpath = "//a[@href='new.php']")
    WebElement navNewPage;

    public AddPage (WebDriver webDriver) {
        super(webDriver);
    }

    void addJobOffer(String name, String description, String benefits, String requirements) throws InterruptedException {
        offerName.sendKeys(name);
        offerDescription.sendKeys(description);
        offerBenefits.sendKeys(benefits);
        offerRequirements.sendKeys(requirements);
        TimeUnit.SECONDS.sleep(2);
    }

    void submitJobOffer() throws InterruptedException {
        offerRequirements.sendKeys(Keys.ENTER);
        TimeUnit.SECONDS.sleep(2);
    }

    void goToNewPage() throws InterruptedException {
        navNewPage.click();
        TimeUnit.SECONDS.sleep(3);
    }
}
