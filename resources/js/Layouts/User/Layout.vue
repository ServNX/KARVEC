<template>
  <div class="row g-0">
    <div class="col-md-2">
      <div class="d-flex flex-column vh-100 w-100 flex-shrink-0 p-3 text-white bg-dark">
        <a href="/" class="mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4 text-primary">Karvec</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active d-flex align-items-center">
              <i class="ri-dashboard-2-line me-2"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center">
              <i class="ri-stack-line me-2"></i> <span>Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center">
              <i class="ri-settings-2-line me-2"></i> <span>Settings</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-10">
      <div class="d-flex flex-column">
        <div class="p-2 bg-dark text-light">
          <h2>User Panel</h2>
        </div>
        <main>
          <div class="container p-5">
            <slot />
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
export default {
  name: 'UserLayout'
};
</script>
