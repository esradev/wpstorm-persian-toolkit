import AxiosWp from "./axios-wp"

export const saveOptions = async (values: any, restRoute: string) => {
  try {
    const res = await AxiosWp.post(restRoute, values)
    return res
  } catch (err) {
    return err
  }
}

export const getOptions = async (restRoute: string) => {
  try {
    const res = await AxiosWp.get(restRoute)
    console.log(res)
    return res.data
  } catch (err) {
    return err
  }
}
