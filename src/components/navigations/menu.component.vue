<template>
	<div class="vs-navigation">
		<ul class="vs-navigation-links">
			<NavLink :to="{ name: RouteName.Dimensions }">Размеры</NavLink>
			<NavLink :to="{ name: RouteName.Edges }">Кромки</NavLink>
			<NavLink :to="{ name: RouteName.Palette }">Палитра</NavLink>
			<NavLink :to="{ name: RouteName.Sinks }">Мойки</NavLink>
			<NavLink :to="{ name: RouteName.Addons }">Дополнения</NavLink>
			<NavLink :to="{ name: RouteName.Result }">Результат</NavLink>
			<NavLink :to="{ name: RouteName.Settings }">
				<template #icon-prepend>
					<IconSettings />
				</template>
				Настройки
			</NavLink>
		</ul>
	</div>
</template>

<script lang="ts" setup>
import NavLink from './nav-link.component.vue'
import IconSettings from '@/components/icons/IconSettings.vue'

import { RouteName } from '@/router'
</script>

<style lang="scss">

</style>