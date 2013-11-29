from fabric.api import cd, env, run
from fabric.contrib.files import exists

env.user = 'maisqueum'
env.user_home = '/home/%s' % env.user
env.source_dir = '%s/testes.maisqueum.com/phpconf-slides' % env.user_home
env.forward_agent = True
env.repository = 'git@github.com:erickwilder/phpconf-slides.git'
env.hosts = ['testes.maisqueum.com']


def version():
    with cd(env.source_dir):
        run('git log -1 --decorate=short --oneline')


def deploy():
    if not exists(env.source_dir):
        run('git clone %s %s' % (env.repository, env.source_dir))

    with cd(env.source_dir):
        run('git fetch -p')
        run('git checkout .')
        run('git merge origin/master')
        run('git submodule update --init')
