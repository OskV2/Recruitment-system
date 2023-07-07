package pl.ttpsc.selenium.recruitment;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.Point;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class AdminAddNewJobOffer {

    private WebDriver driver;

    @BeforeEach
    void setUp() {
        driver = new ChromeDriver();
        driver.get("http://192.168.0.111:8081/templates_admin/add_job_offer.php");
        driver.manage().window().setPosition(new Point(2000, 0));
        driver.manage().window().maximize();
    }

    @Test
    void addJobOffer() throws InterruptedException {
        //variables for testing
        String name = "Oferta";
        String description = "Opis oferty";
        String benefits = "benefit1, benefit2";
        String requirements = "wymaganie1, wymaganie2";

        //tests
        // =========== ADD PAGE
        AddPage addpage = new AddPage(driver);
        addpage.addJobOffer(name, description, benefits, requirements);
        addpage.submitJobOffer();
    }

    @AfterEach
    void tearDown() {
        driver.quit();
    }
}
