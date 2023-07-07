package pl.ttpsc.selenium.recruitment;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.*;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import java.time.Duration;
import java.util.concurrent.TimeUnit;

public class AdminAddNotesTest {

    private WebDriver driver;

    @BeforeEach
    void setUp() {
        driver = new ChromeDriver();
        driver.get("http://192.168.0.111:8081/templates_admin/verification.php");
        driver.manage().window().setPosition(new Point(2000, 0));
        driver.manage().window().maximize();
    }

    void useCollapse(String id) throws InterruptedException {
        WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        WebElement collapse = wait.until(ExpectedConditions.elementToBeClickable(By.xpath("//a[@href='#candidate"+id+"']")));

        JavascriptExecutor js = (JavascriptExecutor) driver;
        js.executeScript("arguments[0].click();", collapse);

        TimeUnit.SECONDS.sleep(2);
    }

    void addNotes(String salary, String notes) throws InterruptedException {
        WebElement salaryInput = driver.findElement(By.id("salary"));
        WebElement notesInput = driver.findElement(By.id("notes"));
        WebElement save = driver.findElement(By.className("admin__collapse-item-content-more-save"));

        salaryInput.sendKeys(salary);
        notesInput.sendKeys(notes);
        TimeUnit.SECONDS.sleep(2);

        JavascriptExecutor js = (JavascriptExecutor) driver;
        js.executeScript("arguments[0].click();", save);
    }

    @Test
    void testAddingNotes() throws InterruptedException {
        //variables for testing

        String salary = "6000";
        String notes = "Test notes";
        String appid = "51";

        //tests
        // =========== VERIFICATION PAGE
        useCollapse(appid);
        addNotes(salary, notes);
        useCollapse(appid);
    }

    @AfterEach
    void tearDown() {
        driver.quit();
    }
}
