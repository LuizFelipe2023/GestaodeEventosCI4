<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>
<div class="container-md my-4">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-12">
            <div class="card rounded-4 shadow border-light">
                <!-- Card Header with Title -->
                <div class="card-header">
                    <h4 class="mb-0">Sobre a Gestão de Eventos</h4>
                </div>

                <!-- Card Body with Content -->
                <div class="card-body">
                    <p>
                        Bem-vindo à nossa plataforma de <strong>Gestão de Eventos</strong>, a solução ideal para gerenciar, organizar e otimizar todos os aspectos de seus eventos. Nosso site foi desenvolvido para facilitar a criação e o acompanhamento de eventos, garantindo que todos os detalhes sejam gerenciados de forma eficiente e sem complicações.
                    </p>
                    <p>
                        Oferecemos ferramentas avançadas para controle de inscrições, coordenação de agendas, envio de convites, acompanhamento de participantes, relatórios e muito mais. Se você é responsável por eventos corporativos, sociais ou culturais, nossa plataforma é a parceira perfeita para garantir o sucesso do seu evento.
                    </p>
                    <p>
                        Navegue por nossas funcionalidades e descubra como podemos ajudar a transformar a gestão do seu evento em uma experiência mais ágil e sem erros.
                    </p>
                    
                    <h5>Funcionalidades Principais:</h5>
                    <ul>
                        <li><strong>Cadastro de Eventos:</strong> Crie eventos facilmente, defina datas, locais e objetivos.</li>
                        <li><strong>Inscrições e Convites:</strong> Gerencie as inscrições e envie convites automáticos para os participantes.</li>
                        <li><strong>Acompanhamento de Participantes:</strong> Mantenha um controle detalhado sobre os participantes e suas preferências.</li>
                        <li><strong>Relatórios Detalhados:</strong> Gere relatórios com dados sobre o evento, como número de inscritos, feedback dos participantes, entre outros.</li>
                        <li><strong>Integração com Calendários:</strong> Sincronize seus eventos com Google Calendar e outras ferramentas de agenda.</li>
                    </ul>

                    <div class="text-center my-4">
                        <img src="https://via.placeholder.com/800x400" alt="Gestão de Eventos" class="img-fluid rounded">
                    </div>
                    <p>
                        Se você está buscando uma plataforma que torne a gestão de eventos mais simples e eficiente, nossa solução é a resposta. Não importa o tamanho do evento, nossa ferramenta se adapta às suas necessidades, proporcionando uma experiência fluida e sem erros.
                    </p>

                    <h5>O que nossos usuários dizem:</h5>
                    <div class="testimonials">
                        <div class="testimonial-item mb-3">
                            <p><strong>João Silva</strong> - <i>Organizador de Eventos</i></p>
                            <blockquote>
                                "A plataforma transformou a maneira como organizamos nossos eventos. A facilidade de gerenciar inscrições e acompanhar a participação dos convidados é incrível."
                            </blockquote>
                        </div>
                        <div class="testimonial-item mb-3">
                            <p><strong>Maria Oliveira</strong> - <i>Coordenadora de Eventos Corporativos</i></p>
                            <blockquote>
                                "Com as ferramentas de relatórios, conseguimos mensurar o sucesso de nossos eventos de maneira objetiva e rápida. Recomendo a plataforma para todos!"
                            </blockquote>
                        </div>
                    </div>

                </div>

                <!-- Card Footer with Call to Action Button -->
                <div class="card-footer text-center">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary">Veja nossos eventos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>
