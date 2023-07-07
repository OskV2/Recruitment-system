package pl.ttpsc.selenium.recruitment;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.*;
import org.openqa.selenium.chrome.ChromeDriver;

import org.openqa.selenium.support.ui.Select;

import java.util.concurrent.TimeUnit;

public class ClientTest {
    private WebDriver driver;

    @BeforeEach
    void setUp() {
        driver = new ChromeDriver();
        driver.get("http://192.168.0.111:8081");
        driver.manage().window().setPosition(new Point(2000, 0));
        driver.manage().window().maximize();
    }

    @Test
    void insertNewApplicationToSystem() throws InterruptedException {
        //variables for testing
        String offerValue = "11";
        String offerName = "Junior Java Developer";

        String name = "Maciej";
        String surname = "Buszkiewicz";
        String email = "abc@def.com";
        String phone = "123456789";
        String github = "https://github.com/OskV2";
        String linkedin = "https://pl.linkedin.com/";
        String additional = "I want to get a job";

        //go to recruitment page
        driver.findElement(By.xpath("//a[@href='./templates/recruitment.php']")).click();

        RecruitmentPage recruitment = new RecruitmentPage(driver);
        TimeUnit.SECONDS.sleep(1);

        Select select = new Select(recruitment.selectOffer);
        //select.selectByValue(offerValue);
        select.selectByVisibleText(offerName);

        recruitment.insertApplication(name, surname, email, phone, github, linkedin, additional);
        TimeUnit.SECONDS.sleep(1);

        recruitment.submitApplication();
        TimeUnit.SECONDS.sleep(3);

        LandingPage landingpage = new LandingPage(driver);
        landingpage.goToCheckPage();
        TimeUnit.SECONDS.sleep(3);

        CheckPage checkpage = new CheckPage(driver);
        checkpage.checkApplicationStatus(landingpage.applicationId);
        TimeUnit.SECONDS.sleep(3);
    }

    @AfterEach
    void tearDown() {
        driver.quit();
    }
}