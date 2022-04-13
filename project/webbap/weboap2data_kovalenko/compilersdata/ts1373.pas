program l5_n23;
var
   i,s:string;
   k:integer;
begin
     read(i);
     for k:=1 to length(i) do
     begin
          if (i[k]+i[k+1])='cb' then
          begin
               s:=s+i[k];
               k:=k+1;
          end else s:=s+i[k];
     end;
write(s);
end.