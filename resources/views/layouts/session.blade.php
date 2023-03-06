<section class="section">
    <div class="content">
      <div class="blogpost-content d-flex justify-content-between align-items-center">
        <h1 class="blogpost-title">List Blog</h1>
        <div class="blogpost-box">
          <select  class="blogpost-category">
            <option value="">Category</option>
            <option value="">Category 1</option>
            <option value="">Category 2</option>
          </select>
        </div>
      </div>
      <div class="blogpost-card-list">
        @for ($i=0;$i<9;$i++)
            <div class="blogpost-card">
            <img
                src="https://images.unsplash.com/photo-1677577434912-84a130e6f555?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="blogpost-card-img"
                class="blogpost-card-img"
            />
            <div class="blogpost-card-content">
                <div class="blogpost-card-infomation d-flex justify-content-between align-items-center">
                <div class="blogpost-card-group d-flex">
                    <div class="blogpost-card-icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        className="w-6 h-6"
                    >
                        <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                        />
                    </svg>
                    </div>
                    <p class="blogpost-card-author">Jimmy Nguyen</p>
                </div>
                <div class="blogpost-card-group d-flex">
                    <div class="blogpost-card-icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    </div>
                    <p class="blogpost-card-author">3 mins ago</p>
                </div>
                </div>
                <h4 class="blogpost-card-title">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                </h4>
                <p class="blogpost-card-paragraph">
                Lorem ipsum dolor sit amet, consectetur ipsum linum amataki
                hulanjfh bfueodap fiefhief...
                </p>
                <div class="blogpost-card-btn">
                <a href="#" class="blogpost-card-link">Read more</a>
                <div class="blogpost-card-right">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 card-icon"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                    />
                    </svg>
                </div>
                </div>
            </div>
            </div>
        @endfor
      </div>
      <div class="session-pagination">
        <ul class="session-pagination-list d-flex align-items-center justify-content-center">
          <li class="session-pagination-item">
            <div class="session-pagination-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 19.5L8.25 12l7.5-7.5"
                />
              </svg>
            </div>
          </li>
          <li class="session-pagination-item">
            <div class="session-pagination-icon session-link d-flex align-items-center justify-content-center">1</div>
          </li>
          <li class="session-pagination-item">
            <div class="session-pagination-icon session-link d-flex align-items-center justify-content-center">2</div>
          </li>
          <li class="session-pagination-item">
            <div
              class="session-pagination-icon session-link d-flex align-items-center justify-content-center session-active"
            >
              3
            </div>
          </li>
          <li class="session-pagination-item">
            <div class="session-pagination-icon session-link d-flex align-items-center justify-content-center">4</div>
          </li>
          <li class="session-pagination-item">
            <div class="session-pagination-icon session-link d-flex align-items-center justify-content-center">5</div>
          </li>
          <li class="session-pagination-item">
            <div class="session-pagination-icon session-link d-flex align-items-center justify-content-center">6</div>
          </li>
          <li class="session-pagination-item">
            <div class="session-pagination-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M8.25 4.5l7.5 7.5-7.5 7.5"
                />
              </svg>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
