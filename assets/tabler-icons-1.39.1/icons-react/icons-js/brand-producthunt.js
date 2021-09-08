import * as React from "react";

function IconBrandProducthunt({
  size = 24,
  color = "currentColor",
  stroke = 2,
  ...props
}) {
  return <svg className="icon icon-tabler icon-tabler-brand-producthunt" width={size} height={size} viewBox="0 0 24 24" strokeWidth={stroke} stroke={color} fill="none" strokeLinecap="round" strokeLinejoin="round" {...props}><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5" /><circle cx={12} cy={12} r={9} /></svg>;
}

export default IconBrandProducthunt;