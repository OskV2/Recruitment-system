package pl.ttpsc.selenium.recruitment;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import org.openqa.selenium.*;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;


import java.time.Duration;
import java.util.concurrent.TimeUnit;

public class AdminTest {
    private WebDriver driver;

    @BeforeEach
    void setUp() {
        driver = new ChromeDriver();
        driver.get("http://192.168.0.111:8081/templates_admin/add_job_offer.php");
        driver.manage().window().setPosition(new Point(2000, 0));
        driver.manage().window().maximize();
    }

    void acceptApplication(String id) throws InterruptedException {
        WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        WebElement accept = wait.until(ExpectedConditions.elementToBeClickable(By.xpath("//a[@href='../templates_sql/increment_status.php?App_Id=" + id + "']")));

        JavascriptExecutor js = (JavascriptExecutor) driver;
        js.executeScript("arguments[0].scrollIntoView(true);", accept);
        js.executeScript("arguments[0].click();", accept);
        TimeUnit.SECONDS.sleep(2);
    }

    void discardApplication(String id) throws InterruptedException {
        WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        WebElement accept = wait.until(ExpectedConditions.elementToBeClickable(By.xpath("//a[@href='../templates_sql/delete_application.php?App_Id=" + id + "']")));

        JavascriptExecutor js = (JavascriptExecutor) driver;
        js.executeScript("arguments[0].scrollIntoView(true);", accept);
        js.executeScript("arguments[0].click();", accept);
        TimeUnit.SECONDS.sleep(2);
    }

    void restoreApplication(String id) throws InterruptedException {
        WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        WebElement restore = wait.until(ExpectedConditions.elementToBeClickable(By.xpath("//a[@href='../templates_sql/restore_application.php?App_Id=" + id + "']")));

        JavascriptExecutor js = (JavascriptExecutor) driver;
        js.executeScript("arguments[0].scrollIntoView(true);", restore);
        js.executeScript("arguments[0].click();", restore);
        TimeUnit.SECONDS.sleep(2);
    }

    void useCollapse(String id) throws InterruptedException {
        WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        WebElement collapse = wait.until(ExpectedConditions.elementToBeClickable(By.xpath("//a[@href='#candidate"+id+"']")));

        JavascriptExecutor js = (JavascriptExecutor) driver;
        js.executeScript("arguments[0].scrollIntoView(true);", collapse);
        js.executeScript("arguments[0].click();", collapse);

        TimeUnit.SECONDS.sleep(2);
    }

    @Test
    void testAdminPage() throws InterruptedException {
        //variables for testing
        String name = "Oferta";
        String description = "Opis oferty";
        String benefits = "benefit1, benefit2";
        String requirements = "wymaganie1, wymaganie2";

        String appid = "81";

        //tests
        // =========== ADD PAGE
        AddPage addpage = new AddPage(driver);
        addpage.addJobOffer(name, description, benefits, requirements);
        addpage.goToNewPage();

        // =========== NEW PAGE
        useCollapse(appid);
        useCollapse(appid);
        acceptApplication(appid);

        NewPage newpage = new NewPage(driver);
        newpage.goToVerificationPage();

        // =========== VERIFICATION PAGE
        acceptApplication(appid);

        VerificationPage verificationpage = new VerificationPage(driver);
        verificationpage.goToInterviewPage();

        // =========== INTERVIEW PAGE
        useCollapse(appid);
        useCollapse(appid);
        discardApplication(appid);

        InterviewPage interviewPage = new InterviewPage(driver);
        interviewPage.goToAdminPage();

        // =========== ADMIN PAGE
        restoreApplication(appid);

        AdminPage adminPage = new AdminPage(driver);
        adminPage.goToNewPage();


        TimeUnit.SECONDS.sleep(1);
    }

    @AfterEach
    void tearDown() {
        driver.quit();
    }
}
