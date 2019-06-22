package page;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedCondition;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class TarefaPage extends BasePage {

	public TarefaPage(WebDriver driver, int turma_id) {
		super(driver, "tarefa/criar/" + turma_id);
	}

	public boolean temNomeTurma(String turma) {
		return driver.getPageSource().contains(turma);
	}

	public boolean temTarefas() {
		return driver.getPageSource().contains("Título");
	}
	
	public boolean formularioOculto() {
		WebElement element = driver.findElement(By.id("nova_tarefa"));
		return ! hasClass(element, "show");
	}
	
	public boolean formularioExibido() {
		WebElement button = driver.findElement(By.id("collapsebutton"));
		button.click();
		
		ExpectedCondition<Boolean> condition = ExpectedConditions.attributeContains(By.id("nova_tarefa"), "class", "show");
		return new WebDriverWait(driver, 10).until(condition);
	}
	
	public boolean criaTarefas() {
		if(formularioExibido()) {
			WebElement prazo = driver.findElement(By.name("prazo"));
			WebElement titulo = driver.findElement(By.name("titulo"));
			WebElement descricao = driver.findElement(By.name("descricao"));
			
			prazo.sendKeys("2019-06-06");
			titulo.sendKeys("Teste automatizado com Selenium");
			descricao.sendKeys("O uso de testes E2E é fundamental para a entrega de software de alta qualidade");
			
			WebElement submit = driver.findElement(By.className("btnupload-form"));
			submit.click();
			
			return driver.getPageSource().contains("2019-06-06") && 
			driver.getPageSource().contains("Teste automatizado com Selenium");
		}
		return false;
	}

	public EditPage editaTarefas(int tarefa_id) {
		criaTarefas();
		driver.findElement(By.id("editar_1")).click();
		return new EditPage(driver, tarefa_id);
	}

	public boolean comfirmaEdicao() {
		return driver.getPageSource().contains("2019-06-07") && 
		driver.getPageSource().contains("Tarefa editada com sucesso");
	}

	public DeletePage removeTarefa(int tarefa_id) {
		criaTarefas();
		driver.findElement(By.id("deletar_1")).click();
		return new DeletePage(driver, tarefa_id);
	}

	public boolean comfirmaRemocao() {
		return ! temTarefas();
	}
}
