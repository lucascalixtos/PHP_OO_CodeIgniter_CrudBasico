package page;

import org.openqa.selenium.WebDriver;

public class E2EPage extends BasePage {

	public E2EPage(WebDriver driver) {
		super(driver, "test/e2e");
	}

	public boolean limpaTabelaDeTeste() {
		return driver.getPageSource().contains("PASSOU");
	}

}
