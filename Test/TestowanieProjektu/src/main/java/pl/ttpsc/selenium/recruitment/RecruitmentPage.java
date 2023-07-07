package pl.ttpsc.selenium.recruitment;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.concurrent.TimeUnit;

public class RecruitmentPage extends BasePage {
    @FindBy(id="select")
    WebElement selectOffer;

    @FindBy(id="imie")
    WebElement nameInput;

    @FindBy(id="nazwisko")
    WebElement surnameInput;

    @FindBy(id="email")
    WebElement emailInput;

    @FindBy(id="telefon")
    WebElement phoneInput;

    @FindBy(id="github_link")
    WebElement githubInput;

    @FindBy(id="linkedin_link")
    WebElement linkedinInput;

    @FindBy(id="additional_info")
    WebElement additionalInput;

    @FindBy(name="submit")
    WebElement submitButton;

    public RecruitmentPage (WebDriver webDriver) {
        super(webDriver);
    }

    void insertApplication(String name, String surname, String email, String phone, String github, String linkedin, String additional) throws InterruptedException {
        nameInput.sendKeys(name);
        surnameInput.sendKeys(surname);
        emailInput.sendKeys(email);
        phoneInput.sendKeys(phone);
        githubInput.sendKeys(github);
        linkedinInput.sendKeys(linkedin);
        additionalInput.sendKeys(additional);
    }

    void submitApplication() {
        //submitButton.click();
        additionalInput.sendKeys(Keys.ENTER);
    }
}
